echo "Enter the number of employee: "
read emp

echo "Details of $emp Employees" >> record.txt

for(( i=1; i<=$emp ; i++ ))
do
  echo "Details of employee: $i " >> record.txt
  echo "Enter the name of employee $i : "
  read name

  echo "Enter the designation: "
  read desg

  echo "Enter your basic salary: "
  read basic

  if [ $basic -lt 10000 ]
    then
      da=`expr $basic \* 25 \/ 100`
      hra=`expr $basic \* 10 \/ 100`
    else
      da=`expr $basic \* 50 \/ 100`
      hra=`expr $basic \* 15 \/ 100`
  fi

  gross=`expr $basic + $da + $hra`

  if [ $gross -gt 25000 ]
  then
    tax=`expr $gross \* 10 \/ 100`
  else
    tax=0
  fi

  net=`expr $gross - $tax`

  echo ""
  echo "---------------- Employee $i--------------------"
  echo ""
  echo "NAME\tDESIGNATION\tBASIC\tDA\tHRA\tGROSS\tTAX\tNET"
  echo "$name\t$desg\t$basic\t$da\t$hra\t$gross\t$tax\t$net"


  #For file output

  echo "---------------- Employee $i--------------------" >>record.txt
  echo "NAME\tDESIGNATION\tBASIC\tDA\tHRA\tGROSS\tTAX\tNET" >> record.txt
  echo "$name\t$desg\t$basic\t$da\t$hra\t$gross\t$tax\t$net" >> record.txt
  echo "------------------------------------------------" >> record.txt
done