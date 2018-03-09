package game;

import java.awt.Graphics;

import javax.swing.ImageIcon;

public class Dot {
	
	private int x,y;
	private boolean isRunning;
	private String imagePath;
	public Dot(int x, int y, boolean isRunning, String imagePath) {
		
		this.x = x;
		this.y = y;
		this.isRunning = isRunning;
		this.imagePath = imagePath;
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
	public boolean isRunning() {
		return isRunning;
	}
	public void setRunning(boolean isRunning) {
		this.isRunning = isRunning;
	}
	public String getImagePath() {
		return imagePath;
	}
	public void setImagePath(String imagePath) {
		this.imagePath = imagePath;
	}
	
	public void draw(Graphics g){
		
		ImageIcon dot = new ImageIcon(imagePath);
		g.drawImage(dot.getImage(),x,y,null);
		
	}

}
