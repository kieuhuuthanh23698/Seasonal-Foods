package com.example.acer_pc.customlistview2;

import android.graphics.Bitmap;
import android.graphics.BitmapFactory;

import java.io.IOException;
import java.io.InputStream;
import java.net.HttpURLConnection;
import java.net.URL;

public class Image{
    String urlImage;
    Bitmap Image;

    public Image(String urlImage) {
        this.urlImage = urlImage;
        try {
            URL url = new URL(urlImage);
            HttpURLConnection connection = (HttpURLConnection) url.openConnection();
            connection.setDoInput(true);
            connection.connect();
            InputStream input = connection.getInputStream();
            this.Image = BitmapFactory.decodeStream(input);
//            this.Image = this.Image.copy(Bitmap.Config.ARGB_8888,true);
  //          this.Image.setHeight(352);
    //        this.Image.setWidth(340);

        } catch (IOException e) {
            Image = null;
        }
    }
}
