#!/bin/sh

# IMAGENAME=${1:-Haftpflicht-kfz}
IMAGENAME=${1:-kfz-versicherung}

# rm -f multi.txt

./create-images.sh $IMAGENAME 2400x
./create-images.sh $IMAGENAME 1200x
./create-images.sh $IMAGENAME 800x
./create-images.sh $IMAGENAME 400x

# cat multi.txt
# $ xargs -a multi.txt -n 1 -d '\n' --max-procs=4 ./multi.sh

php images.php $IMAGENAME >/c/temp/picture-test/images.html
