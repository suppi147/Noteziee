#!/bin/bash

git add .

read message
git commit -am "$message"

git push