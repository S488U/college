/*Write a RMI program to convert dollar to rupees using command line argument. */

/*CurrencyConverter.java: */

import java.rmi.Remote;
import java.rmi.RemoteException;

public interface CurrencyConverter extends Remote {
  double convertDollarToRupee(double dollarAmt) throws RemoteException;
}

/*CurrencyConverterImpl.java: */

import java.rmi.RemoteException;
import java.rmi.server.UnicastRemoteObject;

public class CurrencyConverterImpl extends UnicastRemoteObject implements
CurrencyConverter {

  protected CurrencyConverterImpl() throws RemoteException {
    super();
  }

  public double convertDollarToRupee(double dollarAmt) {
    //Assuming conversion rate of 75 rs per $         
return dollarAmt * 83.0; 
  }
}

/*Server.java: */

import java.rmi.Naming;
import java.rmi.registry.LocateRegistry;

public class Server {
  public static void main(String[] args) {
    try {
      CurrencyConverter converter = new CurrencyConverterImpl();

      //create and start the RMI registry on port 1099 
      LocateRegistry.createRegistry(1099);

      //bind the remote objects stub in the registry 
      Naming.rebind("CurrencyConverterService", converter);

      System.out.println("Server started");
    } catch (Exception e) {
      System.err.println("Server exception:" + e.toString());
      e.printStackTrace();
    }
  }
}

/*Client.java: */

import java.rmi.Naming;
import java.util.Scanner;

public class Client {
  public static void main(String[] args) {
    Scanner sc = new Scanner(System.in);

    System.out.print("Enter the dollar amount: ");
    double dollarAmt = sc.nextDouble();

    try {
      CurrencyConverter converter = (CurrencyConverter)
      Naming.lookup("rmi://localhost/CurrencyConverterService");

      double rupeeAmt = converter.convertDollarToRupee(dollarAmt);
      System.out.println(dollarAmt + " dollar is equal to " + rupeeAmt + " rupees.");
    } catch (Exception e) {
      System.err.println("Client exception: " + e.toString());
      e.printStackTrace();
    }
  }
}