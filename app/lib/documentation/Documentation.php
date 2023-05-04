<?php

namespace lib\documentation;

use src\App;
use src\lib\Helper;

class Documentation extends App
{
    public function __construct()
    {
    }

    public function getDocumentationDirectory(string $baseDirectory = ''): array
    {
        return $this->scanDirectory(APP_DOCUMENTATION_DIRECTORY . $baseDirectory);
    }

    private function scanDirectory(string $directoryPath): array
    {
        $directoryContents = scandir($directoryPath);
        $directory = [];
        foreach ($directoryContents as $directoryContent) {
            if ($directoryContent == '.' || $directoryContent == '..') {
                continue;
            }
            $fullPath = $directoryPath . '/' . $directoryContent;
            if (is_file($fullPath)) {
                $directory[] = [
                    'path' => Helper::removeExtension($directoryContent),
                    'fullPath' => Helper::cleanPath($fullPath),
                    'urlPath' => Helper::removeExtension(
                        Helper::cleanPath(str_replace(APP_BASE_DIRECTORY, '', $fullPath))
                    ),
                    'name' => ucwords(Helper::toSpaceCase(Helper::removeExtension($directoryContent))),
                    'type' => 'file',
                ];
            }
            if (is_dir($fullPath)) {
                $directory[] = [
                    'path' => Helper::removeExtension($directoryContent),
                    'fullPath' => Helper::cleanPath($fullPath),
                    'urlPath' => Helper::removeExtension(
                        Helper::cleanPath(str_replace(APP_BASE_DIRECTORY, '', $fullPath))
                    ),
                    'name' => ucwords(Helper::toSpaceCase(Helper::removeExtension($directoryContent))),
                    'content' => $this->scanDirectory($fullPath),
                    'type' => 'directory',
                ];
            }
        }
        return $directory;
    }

    public function markdownToHtml(?string $markdown): string
    {
        // Convert headers (H1 - H6)
        $markdown = preg_replace_callback('/^#{1,6}\s+(.*)$/m', function ($matches) {
            $level = strlen($matches[0]) - strlen(ltrim($matches[0], '#'));
            return '<h' . $level . '>' . $matches[1] . '</h' . $level . '>';
        }, $markdown);

        // Convert strong (** or __)
        $markdown = preg_replace('/(\*\*)(\S.*?\S)\1/', '<strong>$2</strong>', $markdown);

        // Convert emphasis (* or _)
        $markdown = preg_replace('/(\*)(\S.*?\S)\1/', '<i>$2</i>', $markdown);

        // Syntax Highlight
        $markdown = preg_replace_callback('/```php\n(.*?)```/s', function ($matches) {
            $code = $matches[1];
            $code = highlight_string("<?php\n$code", true);
            $code = str_replace('&lt;?php', '', $code);
            return "<div class=\"markdown\"><pre class=\"php\">$code</pre></div>";
        }, $markdown);

        // Convert links
        $markdown = preg_replace_callback('/\[(.*?)]\((.*?)\)/', function ($matches) {
            $text = $matches[1];
            $url = $matches[2];
            return '<a href="' . $url . '">' . $text . '</a>';
        }, $markdown);

        // Convert inline code
        $markdown = preg_replace('/(`+)(.*?)\1/', '<code>$2</code>', $markdown);

        // Convert paragraphs
        return '<p>' . str_replace("\n\n", '</p><p>', $markdown) . '</p>';
    }
}