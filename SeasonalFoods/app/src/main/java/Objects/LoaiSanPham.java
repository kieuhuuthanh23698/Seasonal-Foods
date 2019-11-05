package Objects;

import com.example.acer_pc.seasonalfoods.R;

import java.util.ArrayList;

public class LoaiSanPham {
    String tenLoaiSP;
    ArrayList<SanPham> listSP;

    public LoaiSanPham(String tenLoaiSP, ArrayList<SanPham> listSP) {
        this.tenLoaiSP = tenLoaiSP;
        this.listSP = new ArrayList<>();

        SanPham item1 = new SanPham("1","Nước Ép Dâu","23.000 đ","25.000 đ", R.drawable.sp1);
        this.listSP.add(item1);

        SanPham item2 = new SanPham("2","Soài Thái","12.000 đ","15.000 đ", R.drawable.sp2);
        this.listSP.add(item2);

        SanPham item3 = new SanPham("3","Lựu","16.000 đ","17.000 đ", R.drawable.sp3);
        this.listSP.add(item3);

        SanPham item4 = new SanPham("4","Dâu Tây","20.000 đ","22.000 đ", R.drawable.sp4);
        this.listSP.add(item4);

        SanPham item5 = new SanPham("5","Táo","20.000 đ","22.000 đ", R.drawable.sp5);
        this.listSP.add(item5);

        SanPham item6 = new SanPham("6","Cherry","23.000 đ","24.000 đ", R.drawable.sp6);
        this.listSP.add(item6);
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
