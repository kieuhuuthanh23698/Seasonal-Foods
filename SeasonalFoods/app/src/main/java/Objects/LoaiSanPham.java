package Objects;

import com.example.acer_pc.seasonalfoods.R;

import java.util.ArrayList;

public class LoaiSanPham {
    String tenLoaiSP;
    ArrayList<SanPham> listSP;

    public LoaiSanPham(String tenLoaiSP, ArrayList<SanPham> listSP) {
        this.tenLoaiSP = tenLoaiSP;
        this.listSP = listSP;
    }

    public String getTenLoaiSP() {
        return tenLoaiSP;
    }

    public void setTenLoaiSP(String tenLoaiSP) {
        this.tenLoaiSP = tenLoaiSP;
    }

    public ArrayList<SanPham> getListSP() {
        return listSP;
    }

    public void setListSP(ArrayList<SanPham> listSP) {
        this.listSP = listSP;
    }
}
