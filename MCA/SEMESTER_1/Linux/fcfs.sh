printf "Enter the num of Process :"
read size

for (( i=0; i<$size; i++ ))
do
  printf "Enter the Burst Time of Process $i : "
  read num
  process[ $i ]=$num;
done

#To Calculate the Wating Time
temp=0
for (( i=0; i<$size; i++ ))
do
  waiting[ $i ]=$temp
  temp=`expr $temp + ${process[ $i ]}`
done

echo "----------------------------------------"
#To Display the Waiting Time
echo "Wating of $size Processes are :"

for (( i=0; i<$size; i++))
do
  printf "${waiting[ $i ]}\n"
done

echo "----------------------------------------"
#Calculating the TurnAround Time using Burst Time + Waiting Time
for ((i=0; i<$size; i++ ))
do
  turning[ $i ]=`expr ${process[ $i ]} + ${waiting[ $i ]}`
done

#Display the TurnAround Time
echo "TurnAround Time of $size Processes are :"

for ((i=0; i<$size; i++ ))
do
  printf "${turning[ $i ]}\n"
done

echo "----------------------------------------"
#Calculate Average Waiting Time
sum=0
for (( i=0; i<$size; i++ ))
do
  sum=`expr $sum + ${waiting[ $i ]}`
done

cal=`expr $sum \/ $size`
printf "\nAverage Waiting time is : $cal ms\n"

#Calculate Average TurnAround Time
sum1=0
for (( i=0; i<$size; i++ ))
do
sum1=`expr $sum1 + ${turning[ $i ]}`
done
call=`expr $sum1 \/ $size`
printf "Average TurnAround time is : $call ms\n\n"
echo "----------------------------------------"