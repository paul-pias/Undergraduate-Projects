package game;
import java.awt.Graphics;
import java.awt.Image;

import javax.swing.ImageIcon;
public class Ball {


	private int x;int y;
	
	private String imagePath;
	boolean isRunning;
	public Ball(int x, int y,boolean isRunning, String imagePath) {
		this.x = x;
		this.y = y;
		this.isRunning=isRunning;
		this.imagePath=imagePath;
		
	}
	public int getX() {
		return x;
	}
	public void setX(int x) {
		this.x = x;
	}
	public int getY() {
		return y;
	}
	public void setY(int y) {
		this.y = y;
	}
	public String getImagePath() {
		return imagePath;
	}
	public void setImagePath(String imagePath) {
		this.imagePath = imagePath;
	}
	
	public boolean getRunning(){
		return isRunning;
	}
	public void setRunning(boolean isRunning){
		this.isRunning=isRunning;
	}
	
	public void draw(Graphics g){
		
		ImageIcon ball = new ImageIcon(imagePath);
		g.drawImage(ball.getImage(), x, y, null);
		
	}
	
}
