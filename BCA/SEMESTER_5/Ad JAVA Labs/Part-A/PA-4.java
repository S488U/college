// 4. Write a Java program for reading and writing a random access file.

import java.io.*;
public class RandomAcc {
  public static void main(String args[]) {
    RandomAccessFile file = null;
    try {
      file = new RandomAccessFile("rand.txt", "rw");
      file.writeChar('X'); // 2 bytes
      file.writeInt(555); // 4 bytes
      file.writeDouble(3.1412); // 8 bytes
      file.writeBoolean(false);
      file.seek(0);
      System.out.println(file.readChar());
      file.seek(2);
      System.out.println(file.readInt());
      file.seek(6);
      System.out.println(file.readDouble());
      file.seek(14);
      System.out.println(file.readBoolean());
    } catch (IOException e) {
      System.out.println(e);
    } finally {
      try {
        file.close();
      } catch (IOException e) {
        System.out.println(e.getMessage());
      }
    }
  }
}
