echo "Enter the number of elements: "
read size

for ((i=0; i<$size; i++))
do
	echo "enter element for index: $i : "
	read input
	myArr[ $i ]=$input
done

echo "Before sorting"
echo ${myArr[*]}

for ((i=0; i<$size; i++))
do
	for ((j=i+1; j<$size; j++))
	do
		if [ ${myArr[ $i ]} -gt ${myArr[ $j ]} ]
		then
			temp=${myArr[ $i ]}
			myArr[ $i ]=${myArr[ $j ]}
			myArr[ $j ]=$temp
		fi
	done
done

echo "After sorting"
echo ${myArr[*]}

# echo "Enter the number of elements: "
# read size

# p=0

# while [ $p -lt $size ]
# do
# 	echo "Enter the Number for index $p: "
# 	read num
# 	myArr[ $p ]=$num
# 	p=`expr $p + 1`
# done

# echo "Before sorting"
# echo ${myArr[*]}

# for ((i=0; i<$size; i++))
# do
#  for((j=0; j<$size; j++))
#  do
# 	k=`expr $j + 1`

# 	if [[ ${myArr[ $j ]} -gt ${myArr[ $k ]} ]]
# 	then
# 		temp=${myArr[ $j ]}
# 		myArr[ $j ]=${myArr[ $k ]}
# 		myArr[ $k ]=$temp
# 		fi
#  done
# done

# echo "After sorting"
# echo ${myArr[*]}