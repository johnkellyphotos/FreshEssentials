#!/bin/bash

echo "Creating project..."

directories=("controller" "lib" "lib/components" "model" "scripts" "styles" "views" "views/template" "views/Home" "views/components")

for _directory in "${directories[@]}"; do
  echo "Creating '$_directory' directory."
  mkdir -p "$_directory"
done

getting_started=(".config.json" ".htaccess" "model/UserModel.php" "views/template/webpage.tpl" "views/template/nav-menu.tpl" "views/template/footer.tpl" "views/components/select.tpl" "views/components/submit.tpl" "views/components/table.tpl" "views/components/text.tpl" "controller/HomeController.php")
for file in "${getting_started[@]}"; do
  echo "Loading file '$file'."
  mv src/_getting-started/__"$file" ./"$file"
done  

rm -R src/_getting-started