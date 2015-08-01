#!/bin/bash

find ../ -type f -regex '.*\.php\|.*\.php\.j2' -exec php -l {} \; | grep "Errors parsing ";

if [ $? -ne 0 ]
then
	exit 0
else
	exit 1
fi
