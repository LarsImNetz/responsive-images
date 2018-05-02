#!/bin/bash

FILE=/c/development/typo3/web/current/public/fileadmin/drk/versicherung/kfz-versicherung/Haftpflicht-kfz.jpg
CONVERT=/c/ImageMagick-7.0.7-28/convert.exe

DESTINATION=/c/temp/picture-test
NEWSIZE=${1:-1200x}

mkdir -p $DESTINATION

for quality in $(seq 80 -1 1); do

    BASENAME=$(basename "${FILE}")
    DIRNAME=$(dirname "${FILE}")

    PICTURE=${BASENAME/.jpg/}
    echo "convert to quality $quality"
    $CONVERT "${DIRNAME}/${PICTURE}.jpg" -quality $quality -resize ${NEWSIZE} "${DESTINATION}/${PICTURE}_${quality}q_${NEWSIZE}.jpg"
done
