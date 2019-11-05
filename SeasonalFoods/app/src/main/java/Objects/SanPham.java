package Objects;

public class SanPham {
    String maSP, tenSP, gia, giaKM;
    int hinhanh;

    public SanPham(String maSP,String tenSP, String giaKM, String gia, int hinhanh) {
        this.maSP = maSP;
        this.tenSP = tenSP;
        this.gia = gia;
        this.giaKM = giaKM;
        this.hinhanh = hinhanh;
    }

    public String getTenSP() {
        return tenSP;
    }

    public void setTenSP(String tenSP) {
        this.tenSP = tenSP;
    }

    public String getGia() {
        return gia;
    }

    public void setGia(String gia) {
        this.gia = gia;
    }

    public String getGiaKM() {
        return giaKM;
    }

    public void setGiaKM(String giaKM) {
        this.giaKM = giaKM;
    }

    public int getHinhanh() {
        return hinhanh;
    }

    public void setHinhanh(int hinhanh) {
        this.hinhanh = hinhanh;
    }
}
