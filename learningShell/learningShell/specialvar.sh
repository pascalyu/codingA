# $0 - The filename of the current script.|
# $n - The Nth argument passed to script was invoked or function was called.|
# $# - The number of argument passed to script or function.|
# $@ - All arguments passed to script or function.|
# $* - All arguments passed to script or function.|
# $? - The exit status of the last command executed.|
# $$ - The process ID of the current shell. For shell scripts, this is the process ID under which they are executing.|
# $! - The process number of the last background command.|

#!/bin/bash
echo "Script Name: $0"
function func {
    for var in $*
    do
        let i=i+1
        echo "The \$${i} argument is: ${var}"
    done
    echo "Total count of arguments: $#"
}
func We are argument

function func2 {
    echo "--- \"\$*\""
    for ARG in "$*"
    do
        echo $ARG
    done

    echo "--- \"\$@\""
    for ARG in "$@"
    do
        echo $ARG
    done
}
func2 We are argument