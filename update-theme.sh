!#bin/bash 
rsync -arvz -e 'ssh -p 74' --progress * luyen@digital-atlas.com:/home/luyen/digital-atlas.com/blackrhino/wp-content/themes/BlackRhino/
