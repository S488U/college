/*Create a base class box with height, depth and width. Add a method to calculate 
volume. Write all possible constructors. Create a derived class with additional data 
members weight and colour. Make usage of the keyword super. */

import java.util.*;

class Box {
    double width, height, depth;

    Box(double wid, double hei, double dep) {
        this.width = wid;
        this.height = hei;
        this.depth = dep;
    }

    public void volume() {
        System.out.println("The volume = " + (width * height * depth));
    }
}

class Shape extends Box {
    String color;
    double weight;

    Shape(double wid, double hei, double dep, double wei, String col) {
        super(wid, hei, dep);
        this.color = col;
        this.weight = wei;
    }

    public void showInfo() {
        System.out.println("Weight = " + weight);
        System.out.println("Color = " + color);
        volume();
    }
}

public class PB_3 {
    public static void main(String args[]) {
        double h, w, wei, d;
        String colour;
        Scanner ob = new Scanner(System.in);
        Shape S;
        System.out.print("Enter the height: ");
        h = ob.nextDouble();
        System.out.print("Enter the width: ");
        w = ob.nextDouble();
        System.out.print("Enter the depth: ");
        d = ob.nextDouble();
        System.out.print("Enter the weight of the shape: ");
        wei = ob.nextDouble();
        System.out.print("Enter the color of the shape: ");
        colour = ob.next();
        S = new Shape(w, h, d, wei, colour);
        S.showInfo();
        ob.close();
    }
}

/*

OUTPUT: -

Enter the height: 170
Enter the width: 45
Enter the depth: 67
Enter the weight of the shape: 56
Enter the color of the shape: yellow
Weight = 56.0        
Color = yellow       
The volume = 512550.0

 */