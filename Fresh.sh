#!/bin/bash

clean_project() {
  echo -n "Are you sure you want to delete this project? This will delete any new files you have added or changes you have made, and cannot be undone. [y/n]: "
  read -r answer

  case ${answer:0:1} in
  y | Y)
    directories=("controller" "lib" "model" "scripts" "styles" "views" "css")
    for _directory in "${directories[@]}"; do
      rm -R "app/$_directory"
    done
    files=(".htaccess" ".config.json" "index.php" "config.php")
    for _file in "${files[@]}"; do
      rm "app/$_file"
    done

    getting_started_directory="app/src/_getting-started/"
    find "$getting_started_directory" -type f | while read -r file; do
        new_name="${file%.template}"
        mv "$file" "$new_name"
    done

    echo "Project has been deleted"
    ;;
  *)
    exit 0
    ;;
  esac

}

create_project() {
  echo "Creating project..."

  directories=("controller" "lib" "lib/components" "model" "scripts" "styles" "views" "views/template" "views/Home" "views/components" "views/App" "css")

  for _directory in "${directories[@]}"; do
    echo "Creating '$_directory' directory."
    mkdir -p "app/$_directory"
  done

  getting_started=(".config.json" ".htaccess" "index.php" "config.php" "model/UserModel.php" "views/template/webpage.tpl" "views/template/nav-menu.tpl" "views/template/footer.tpl" "views/components/select.tpl" "views/components/submit.tpl" "views/components/table.tpl" "views/components/text.tpl" "views/App/forbidden.tpl" "views/App/internal-server-error.tpl" "views/App/page-not-found.tpl" "views/Home/index.tpl" "controller/HomeController.php" "css/app.css" "lib/AppError.php")
  for file in "${getting_started[@]}"; do
    echo "Loading file '$file'."
    cp app/src/_getting-started/__"$file" "app/$file"
  done

  getting_started_directory="app/src/_getting-started/"

  find "$getting_started_directory" -type f | while read -r file; do
      new_name="${file%}.template"
      mv "$file" "$new_name"
  done
}

argument="$1"

case $argument in
"--help")
  echo "    ./Fresh.sh --create    to create a new project."
  echo "    ./Fresh.sh --clean     to clean your project (reset entire project)."
  echo "    ./Fresh.sh --help      for help."
  ;;
"--clean")
  clean_project
  ;;
"--create")
  create_project
  ;;
*)
  echo "Invalid parameter '$argument'. use --help for help."
  ;;
esac

exit 0
