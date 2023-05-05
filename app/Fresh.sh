#!/bin/bash

clean_project() {
  echo -n "Are you sure you want to delete this project? [y/n]: "
  read -r answer

  case ${answer:0:1} in
  y | Y)
    directories=("controller" "lib" "model" "scripts" "styles" "views")
    for _directory in "${directories[@]}"; do
      rm -R "$_directory"
    done
    files=(".htaccess" ".config.json" "index.php")
    for _file in "${files[@]}"; do
      rm "$_file"
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

  directories=("controller" "lib" "lib/components" "model" "scripts" "styles" "views" "views/template" "views/Home" "views/components")

  for _directory in "${directories[@]}"; do
    echo "Creating '$_directory' directory."
    mkdir -p "$_directory"
  done

  getting_started=(".config.json" ".htaccess" "index.php" "model/UserModel.php" "views/template/webpage.tpl" "views/template/nav-menu.tpl" "views/template/footer.tpl" "views/components/select.tpl" "views/components/submit.tpl" "views/components/table.tpl" "views/components/text.tpl" "views/App/forbidden.tpl" "views/App/internal-server-error.tpl" "views/App/page-not-found.tpl" "views/Home/index.tpl" "controller/HomeController.php")
  for file in "${getting_started[@]}"; do
    echo "Loading file '$file'."
    cp src/_getting-started/__"$file" ./"$file"
  done
}

argument="$1"

case $argument in
"--help")
  echo "help"
  ;;
"--clean")
  clean_project
  ;;
"--create")
  create_project
  ;;
"--update")
  echo "Nothing to update."
  ;;
*)
  echo "Invalid parameter '$argument'. use --help for help."
  ;;
esac

exit 0
