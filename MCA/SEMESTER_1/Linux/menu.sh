while [ 1 ]
do
  printf "Enter your choice
  1. Create a new file
  2. Read the content of existing file
  3. Move or Rename file
  4. Copy file
  5. Delete file
  6. Create new directory
  7. Delete directory
  8. Display file permissions
  9. Display logged-in users
  10. Display date
  11. Display present working directory
  12. Display files and folders in current directory
  13. Exit
  "

  read choice

  case $choice in
    1)
      printf "Enter the name of the file - "
      read file
      if [ -f "$file" ]
      then 
        printf "file already exists\n"
      else 
        touch $file
      fi
    ;;
    2)
      printf "Enter the name of the file you want to read\n"
      read file
      if [ -f "$file" ]
      then 
        cat $file
      else 
        printf "file doesnt exists\n"
      fi
    ;;
    3)
      printf "Enter the name of the file you want to move or rename\n"
      read file
      if [ -f "$file" ]
      then 
        printf "enter new file name\n"
        read newFile
        mv $file $newFile
        printf "created successfully\n"
      else 
        printf "file doesnt exists\n"
      fi
    ;;
    4)
      printf "enter file name\n"
      read file
      if [ -f "$file" ]
      then  
        printf "enter the new file\n"
        read newFile
        cp $file $newFile
        printf "copied\n"
      else
        printf "source file doesn't exist\n"
      fi
    ;;
    5)
      printf "enter file name to delete\n"
      read file
      if [ -f "$file" ]
      then
        read newFile
        cp $file $newFile
        printf "copied\n"
      else
        printf "file doesn't exist\n"
      fi
    ;;
    6)  
      printf "enter directory name\n"
      read dirname
      if [ -d "$dirname" ]
      then
        printf "dir exists\n"
      else
        mkdir $dirname
        printf "created\n"
      fi
    ;;
    7)
      printf "enter directory name\n"
      read dirname
      if [ -d "$dirname" ]
      then
        rmdir $dirname
        printf "deleted dir\n"
      else
        printf "doesnt exist\n"
      fi
    ;;
    8)
      printf "enter file name\n"
      read file
      if [ -f "$file" ]
      then
        ls -l $file
      else
        printf "doesnt exist\n"
      fi
    ;;  
    9)
      printf "Logged in users: \n"
      who
    ;;
    10)
      date
    ;;
    11)
      pwd
    ;;
    12)
      ls
    ;;
    13)
      exit 0
    ;;
    *)
      printf "Invalid choice\n"
    ;;
    esac
done