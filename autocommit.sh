#!/bin/bash
if [ ! -d .git ]; then
    echo "Current directory is not a git repository."
    read -p "Should I initiate it for you (check your .gitignore before answering Y) ? (Y/N, default no) " yn
    case $yn in
            [Yy]* ) git init && git add . && git commit -m "Initial commit";;
            *) echo "nothing done." ;;
      esac
fi
if [ -d .git ]; then
    echo "Auto commit running. Have fun and press CTRL-C to finish."
    while true; do
        if `vendor/bin/phpunit --stop-on-failure --stop-on-risky --stop-on-defect --disallow-test-output --testdox-text .testResult tests > /dev/null 2>&1` ; then
            if commitMessage=$(git diff .testResult |grep "^\-\ \|^\+\ ") ; then
              echo "test result has changed, commiting."
            else
              commitMessage=refactoring
            fi
            git add . && git commit -m "$commitMessage" > /dev/null
        fi
    done
fi;
