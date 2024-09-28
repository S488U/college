/*Write a RMI program to convert temperature to Fahrenheit and vice versa. */

/*TemperatureConverter.java: */

import java.rmi.Remote;
import java.rmi.RemoteException;

public interface TemperatureConverter extends Remote {
  double celsiusToFahrenheit(double celsius) throws RemoteException;

  double fahrenheitToCelsius(double fahrenheit) throws RemoteException;
}

/*TemperatureConverterImpl.java: */

import java.rmi.RemoteException;
import java.rmi.server.UnicastRemoteObject;

public class TemperatureConverterImpl extends UnicastRemoteObject implements TemperatureConverter {

  protected TemperatureConverterImpl() throws RemoteException {
    super();
  }

  public double celsiusToFahrenheit(double celsius) {
    return (celsius * 9 / 5) + 32;
  }

  public double fahrenheitToCelsius(double fahrenheit) {
    return (fahrenheit - 32) * 5 / 9;
  }
}
/*Server.java: */

import java.rmi.Naming;
import java.rmi.registry.LocateRegistry;

public class Server {
  public static void main(String args[]) {
    try {
      TemperatureConverter converter = new TemperatureConverterImpl();

      //Create and start the RMI registry on port 1099
      LocateRegistry.createRegistry(1099);

      //Bind the remote object's stub in the registry
      Naming.rebind("TemperatureConverterService", converter);
      System.out.println("Server started");
    } catch (Exception e) {
      System.err.println("Server exception: " + e.toString());
      e.printStackTrace();
    }
  }
}

/*Client.java: */

import java.rmi.Naming;
import java.util.Scanner;

public class Client {
  public static void main(String args[]) {
    try {
      Scanner scanner = new Scanner(System.in);
      System.out.print("Enter temperature in Celsius: ");
      double celsius = scanner.nextDouble();

      TemperatureConverter converter = (TemperatureConverter) Naming.lookup("rmi://localhost/TemperatureConverterService");

      double fahrenheit = converter.celsiusToFahrenheit(celsius);

      System.out.println(celsius + " degree Celsius is equal to " + fahrenheit + " degrees Fahrenheit.");

      System.out.print("Enter temperature in Fahrenheit: ");
      double fahrenheitInput = scanner.nextDouble();

      double newCelsius = converter.fahrenheitToCelsius(fahrenheitInput);
      System.out.println(fahrenheitInput + " degrees Fahrenheit is equal to " + newCelsius + " degrees Celsius.");
    } catch (Exception e) {
      System.err.println("Client exception: " + e.toString());
      e.printStackTrace();
    }
  }
}