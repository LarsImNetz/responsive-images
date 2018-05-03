#!/bin/bash

IMAGENAME=${1:-Haftpflicht-kfz}
FILE=/c/development/typo3/web/current/public/fileadmin/drk/versicherung/kfz-versicherung/$IMAGENAME.jpg
CONVERT=/c/ImageMagick-7.0.7-28/convert.exe
COMPARE=/c/ImageMagick-7.0.7-28/compare.exe

DESTINATION=/c/temp/picture-test
NEWSIZE=${2:-1200x}

mkdir -p $DESTINATION

for quality in $(seq 80 -5 1); do

    BASENAME=$(basename "${FILE}")
    DIRNAME=$(dirname "${FILE}")

    PICTURE=${BASENAME/.jpg/}
    echo "convert $PICTURE to quality $quality"
    # best
    $CONVERT "${DIRNAME}/${PICTURE}.jpg" -quality $quality -filter triangle -resize ${NEWSIZE} "${DESTINATION}/${PICTURE}_${quality}q_${NEWSIZE}.jpg"
    $CONVERT "${DIRNAME}/${PICTURE}.jpg" -quality $quality         -adaptive-resize ${NEWSIZE} "${DESTINATION}/${PICTURE}_${quality}q_${NEWSIZE}_a.jpg"

    $CONVERT "${DIRNAME}/${PICTURE}.jpg" -quality $quality -filter Gaussian -resize ${NEWSIZE} "${DESTINATION}/${PICTURE}_${quality}q_${NEWSIZE}_b.jpg"
    # $CONVERT "${DIRNAME}/${PICTURE}.jpg" -quality $quality -define filter:blur=0.75 -filter Gaussian -resize ${NEWSIZE} "${DESTINATION}/${PICTURE}_${quality}q_${NEWSIZE}_c.jpg"
    $CONVERT "${DIRNAME}/${PICTURE}.jpg" -quality $quality -filter Cosine -resize ${NEWSIZE} "${DESTINATION}/${PICTURE}_${quality}q_${NEWSIZE}_c.jpg"
    # poor
    # $CONVERT "${DIRNAME}/${PICTURE}.jpg" -quality $quality    -adaptive-blur 4x2 -resize ${NEWSIZE} "${DESTINATION}/${PICTURE}_${quality}q_${NEWSIZE}_b.jpg"
    # $CONVERT "${DIRNAME}/${PICTURE}.jpg" -quality $quality -adaptive-sharpen 4x2 -resize ${NEWSIZE} "${DESTINATION}/${PICTURE}_${quality}q_${NEWSIZE}_a.jpg"
    # $COMPARE "${DESTINATION}/${PICTURE}_${quality}q_${NEWSIZE}.jpg" "${DESTINATION}/${PICTURE}_${quality}q_${NEWSIZE}_a.jpg" "${DESTINATION}/${PICTURE}_${quality}q_${NEWSIZE}_compare.jpg"
done
