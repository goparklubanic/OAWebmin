#!/bin/sh
if [ $# -eq 0 ]
  then
    mysql ayampedas -u chikenspicy -ppenam80ngan;
  else 
    mysql ayampedas -u chikenspicy -ppenam80ngan < $1
fi

