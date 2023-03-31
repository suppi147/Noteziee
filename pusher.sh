#!/bin/bash

git add .

echo "enter commit: "
read message
git commit -am "$message"

git push