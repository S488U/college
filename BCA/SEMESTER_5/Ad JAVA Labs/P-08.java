/* Write a JDBC program to process a bank transaction. */

import java.sql.*;
import java.io.DataInputStream;

public class BankTransaction {
   public static void main(String[] args) throws ClassNotFoundException {
      Class.forName("com.mysql.cj.jdbc.Driver");
      String jdbcUrl = "jdbc:mysql://localhost:3306/bank_db";
      String username = "root";
      String password = "root";
      int flag = 0;
      try {
         Connection connection = DriverManager.getConnection(jdbcUrl, username, password);
         Statement statement = connection.createStatement();
         System.out.println("Enter the account number");
         DataInputStream din = new DataInputStream(System.in);
         int accno = Integer.parseInt(din.readLine());
         String sqlQuery = "SELECT * FROM accountdetails where account_num = "+ accno;
         ResultSet resultSet = statement.executeQuery(sqlQuery);
         while (resultSet.next()) {
            int userId = resultSet.getInt("account_num");
            String userName = resultSet.getString("name");
            String balance = resultSet.getString("balance");
            System.out.println("User ID: " + userId);
            System.out.println("User Name: " + userName);
            System.out.println("Balance: " + balance);
            System.out.println();
            flag = 1;
         }
         if (flag == 0) {
            System.out.println("No Record Found");
         }
         resultSet.close();
         statement.close();
         connection.close();
      } catch (Exception e) {
         e.printStackTrace();
      }
   }
}