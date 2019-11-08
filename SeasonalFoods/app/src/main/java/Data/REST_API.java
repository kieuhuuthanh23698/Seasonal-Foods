package Data;

import com.example.acer_pc.seasonalfoods.R;

import java.util.ArrayList;

import Objects.SanPham;

public class REST_API {

    public REST_API() {
    }

    public String login(String username, String password){
        if(username.equals("123") && password.equals("123"))
            return "KH01";//true
        return "";//false
    }

    public ArrayList<SanPham> getSanPham_TheoLoai(String idLoaiSP) {
        ArrayList<SanPham> listSP = new ArrayList<>();
        switch (idLoaiSP){
            case "0":
                SanPham item1 = new SanPham("1","Nước Ép Dâu",(double)23000,(double)25000, R.drawable.sp1);
                listSP.add(item1);
                SanPham item2 = new SanPham("2","Soài Thái",(double)12000,(double)15000, R.drawable.sp2);
                listSP.add(item2);
                SanPham item3 = new SanPham("3","Lựu",(double)16000,(double)17000, R.drawable.sp3);
                listSP.add(item3);
                SanPham item4 = new SanPham("4","Dâu Tây",(double)22000,(double)22000, R.drawable.sp4);
                listSP.add(item4);
                SanPham item5 = new SanPham("5","Táo",(double)22000,(double)22000, R.drawable.sp5);
                listSP.add(item5);
//                SanPham item6 = new SanPham("6","Cherry",(double)23000,(double)24000, R.drawable.sp6);
//                listSP.add(item6);
                break;
            case "1":
                SanPham item7 = new SanPham("7","Cải Thìa",(double)23000,(double)25000, R.drawable.sp1);
                listSP.add(item7);
                SanPham item8 = new SanPham("8","Bắp Cải",(double)12000,(double)15000, R.drawable.sp2);
                listSP.add(item8);
                SanPham item9 = new SanPham("9","Bí Ngô",(double)16000,(double)17000, R.drawable.sp3);
                listSP.add(item9);
                SanPham item10 = new SanPham("10","Cà Rốt",(double)22000,(double)22000, R.drawable.sp4);
                listSP.add(item10);
                SanPham item11 = new SanPham("11","Cà Chua",(double)22000,(double)22000, R.drawable.sp5);
                listSP.add(item11);
                SanPham item12 = new SanPham("12","Củ Dền",(double)23000,(double)24000, R.drawable.sp6);
                listSP.add(item12);
                break;
            case "2":
                SanPham item13 = new SanPham("13","Quế",(double)23000,(double)25000, R.drawable.sp1);
                listSP.add(item13);
                SanPham item14 = new SanPham("14","Hồi",(double)12000,(double)15000, R.drawable.sp2);
                listSP.add(item14);
                SanPham item15 = new SanPham("15","Đinh Hương",(double)16000,(double)17000, R.drawable.sp3);
                listSP.add(item15);
                SanPham item16 = new SanPham("16","Húng Quế",(double)22000,(double)22000, R.drawable.sp4);
                listSP.add(item16);
                SanPham item17 = new SanPham("17","Hà Thủ Ô",(double)22000,(double)22000, R.drawable.sp5);
                listSP.add(item17);
                SanPham item18 = new SanPham("18","Nghệ",(double)23000,(double)24000, R.drawable.sp6);
                listSP.add(item18);
                break;
            case "3":
                SanPham item19 = new SanPham("19","Cá",(double)23000,(double)25000, R.drawable.sp1);
                listSP.add(item19);
                SanPham item20 = new SanPham("20","Tôm Hùm",(double)12000,(double)15000, R.drawable.sp2);
                listSP.add(item20);
                SanPham item21 = new SanPham("21","Nghêu",(double)16000,(double)17000, R.drawable.sp3);
                listSP.add(item21);
                SanPham item22 = new SanPham("22","Hến",(double)22000,(double)22000, R.drawable.sp4);
                listSP.add(item22);
//                SanPham item23 = new SanPham("23","Hào",(double)22000,(double)22000, R.drawable.sp5);
//                listSP.add(item23);
//                SanPham item24 = new SanPham("24","Ốc",(double)23000,(double)24000, R.drawable.sp6);
//                listSP.add(item24);
                break;
            case "4":
                SanPham item25 = new SanPham("25","Nắm",(double)23000,(double)25000, R.drawable.sp1);
                listSP.add(item25);
                SanPham item26 = new SanPham("26","Tỏi",(double)12000,(double)15000, R.drawable.sp2);
                listSP.add(item26);
                SanPham item27 = new SanPham("27","Tiêu",(double)16000,(double)17000, R.drawable.sp3);
                listSP.add(item27);
                SanPham item28 = new SanPham("28","Cà Phê",(double)22000,(double)22000, R.drawable.sp4);
                listSP.add(item28);
                SanPham item29 = new SanPham("29","Điều",(double)22000,(double)22000, R.drawable.sp5);
                listSP.add(item29);
                SanPham item30 = new SanPham("30","Ớt",(double)23000,(double)24000, R.drawable.sp6);
                listSP.add(item30);
                break;
        }
        return listSP;
    }


}
