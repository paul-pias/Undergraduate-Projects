package game;

import javax.swing.JFrame;
import javax.swing.JOptionPane;

public class Main {

	public static void main(String[] args) {
	
		
		Window w = new Window();
		
		JFrame gameFrame = new JFrame();
		gameFrame.setTitle("Color Switch");
		gameFrame.setSize(800, 860);
		gameFrame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		gameFrame.add(w);
		gameFrame.setVisible(true);
		
		w.startGame();

		gameFrame.dispose();

	}
	
	

}
