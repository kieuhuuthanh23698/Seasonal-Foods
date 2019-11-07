package Objects;

import java.text.DecimalFormat;
import java.text.NumberFormat;

public class SanPham {
    String maSP, tenSP;
    Double gia, giaKM;
    int hinhanh;

    public SanPham(String maSP,String tenSP, Double giaKM, Double gia, int hinhanh) {
        this.maSP = maSP;
        this.tenSP = tenSP;
        this.gia = gia;
        this.giaKM = giaKM;
        this.hinhanh = hinhanh;
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

    public int getHinhanh() {
        return hinhanh;
    }

    public void setHinhanh(int hinhanh) {
        this.hinhanh = hinhanh;
    }
}
