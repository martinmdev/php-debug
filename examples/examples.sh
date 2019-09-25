#!/bin/bash

DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" >/dev/null 2>&1 && pwd)"

cd "$DIR"

for f in ./helpers/*; do
  echo $f
  php $f
done

for f in ./DebugHelper/*; do
  echo $f
  php $f
done
