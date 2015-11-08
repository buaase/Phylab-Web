#!/bin/bash
export LD_LIBRARY_PATH=/lib;cd $1;python $2 $3 $4;exit;
