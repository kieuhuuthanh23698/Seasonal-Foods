package Objects;

import android.graphics.Bitmap;
import android.graphics.BitmapFactory;

import java.io.IOException;
import java.io.InputStream;
import java.net.HttpURLConnection;
import java.net.URL;
import java.text.DecimalFormat;
import java.text.NumberFormat;

public class SanPham {
    String maSP, tenSP;
    Double gia, giaKM;
    String image_name;
    Bitmap image;

    public SanPham(String maSP,String tenSP, Double giaKM, Double gia, String image) {
        this.maSP = maSP;
        this.tenSP = tenSP;
        this.gia = gia;
        this.giaKM = giaKM;
        this.image_name = image;
    }

    public String getMaSP() {
        return maSP;
    }

    public String getTenSP() {
        return tenSP;
    }

    public void setTenSP(String tenSP) {
        this.tenSP = tenSP;
    }

    public Double getGia() {
        return gia;
    }

    public void setGia(Double gia) {
        this.gia = gia;
    }

    public Double getGiaKM() {
        return giaKM;
    }

    public void setGiaKM(Double giaKM) {
        this.giaKM = giaKM;
    }

    public Bitmap getHinhanh() {
        try {
            String urlImage = "http://" + "172.19.201.2:8080" + "/SeasonalFoods2/public/images/products/" + this.image_name;
            URL url = new URL(urlImage);
            HttpURLConnection connection = (HttpURLConnection) url.openConnection();
            connection.setDoInput(true);
            connection.connect();
            InputStream input = connection.getInputStream();
            this.image = BitmapFactory.decodeStream(input);

        } catch (IOException e) {
            this.image = null;
        }
        return this.image;
    }

    public void setHinhanh(Bitmap image) {
        this.image = image;
    }
}
