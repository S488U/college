/* 3.Write a java program to copy a character from one file to another. */

import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
public class FileCopy {
  public static void main(String args[]) {
    String sourceFile = "source.txt";
    String destinationFile = "destination.txt";
    try {
      FileReader reader = new FileReader(sourceFile);
      FileWriter writer = new FileWriter(destinationFile);
      int character;
      while ((character = reader.read()) != -1) {
        writer.write(character);
      }
      reader.close();
      writer.close();
      System.out.println("File copied successfully");
    } catch (IOException e) {
      System.out.println("An error occured:" + e.getMessage());
    }
  }
}

/*
Output:
  source.txt file content: Hey Guys!!
  destination.txt file content: Hey Guys!!
*/
