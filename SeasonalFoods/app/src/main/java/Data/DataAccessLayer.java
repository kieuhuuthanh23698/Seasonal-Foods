package Data;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.widget.Toast;

import org.json.JSONException;

import java.net.PortUnreachableException;
import java.util.ArrayList;
import java.util.concurrent.ExecutionException;

import Objects.CT_GioHang;
import Objects.LoaiSanPham;
import Objects.SanPham;


public class DataAccessLayer {
    DB_Helper db_helper;
    REST_API api;
    SQLiteDatabase db = null;
    Context context;

    public DataAccessLayer(Context context) {
        this.context = context;
        this.db_helper = new DB_Helper(context);
        api = new REST_API();
    }

    //LẤY THÔNG TIN LOGIN TỪ LOCAL
    public String[] getLogin(){
        this.db = this.db_helper.getDb();
        String[] login = new String[]{"",""};
        String sql = "SELECT * FROM login";
        Cursor cursor = db.rawQuery(sql ,null);
        while (cursor.moveToNext()){
            login[0] = cursor.getString(0);
            login[1] = cursor.getString(1);
        }
        if(login[0] == "")
            return null;
        return login;
    }

    //REQUEST TO SERVER
    public String login(String username, String password){
        String res = api.login(username,password);
        if(!res.isEmpty())// khác "" là dn success
        {
            this.db = this.db_helper.getDb();
            String[] login = new String[]{"",""};
            String sql = "SELECT * FROM login";
            Cursor cursor = db.rawQuery(sql ,null);
            while (cursor.moveToNext()){
                login[0] = cursor.getString(0);
                login[1] = cursor.getString(1);
            }

            ContentValues contentValues = new ContentValues();
            contentValues.put("name", login[0]);
            contentValues.put("pass", login[1]);

            if(login[0] == "") {
                if(db.insert("login", null,contentValues) > 0)
                    Toast.makeText(context, "Save login successful", Toast.LENGTH_SHORT).show();
                else
                {
                    Toast.makeText(context, "Save login failed", Toast.LENGTH_SHORT).show();
                    return "";
                }
            }
            else {
                if(db.update("login", contentValues, "", null) > 0)
                    Toast.makeText(context, "Save login successful", Toast.LENGTH_SHORT).show();
                else
                {
                    Toast.makeText(context, "Save login failed", Toast.LENGTH_SHORT).show();
                    return "";
                }
            }
        }
        return res;
    }

<<<<<<< HEAD:SeasonalFoods/app/src/main/java/Data/DAL.java
    public ArrayList<LoaiSanPham> getFoods() throws InterruptedException, ExecutionException, JSONException {
        return this.api.getFoods();
    }

    public ArrayList<SanPham> search(String valueSearch) throws InterruptedException, ExecutionException, JSONException {
        return this.api.search(valueSearch);
=======
    public ArrayList<SanPham> getSanPham_TheoLoai(String idLoaiSP) {
        return api.getSanPham_TheoLoai(idLoaiSP);
    }

    public ArrayList<SanPham> search(String valueSearch){
        return api.search(valueSearch);
>>>>>>> c9114e5b45092880c598a98581d460a92bee061b:SeasonalFoods/app/src/main/java/Data/DataAccessLayer.java
    }

    public boolean register(String name,int gender, String phone,String diachi,String email,String username,String password){
        return api.register( name, gender, phone, diachi, email, username,password);
    }

    //QUERY FROM DATABASE LOCAL
    public void loadGioHang(ArrayList<CT_GioHang> gioHangs) {
        this.db = this.db_helper.getDb();
        String sql = "SELECT * FROM ct_donhang";
        Cursor cursor = db.rawQuery(sql ,null);
        while (cursor.moveToNext()){
            CT_GioHang item = new CT_GioHang(cursor.getString(0),cursor.getString(1));
            gioHangs.add(item);
        }
    }

    public String existInCart(String id)
    {
        this.db = this.db_helper.getDb();
        String result = "";
        String sql = "SELECT soluong FROM ct_donHang where id like '"+ id + "'";
        Cursor cursor = db.rawQuery(sql ,null);
        while (cursor.moveToNext()){
            result = cursor.getString(0);
        }
        if(result.equals(""))
            result = "0";
        return result;
    }

    public void update_SoLuong_SP(String id, String value){
        ContentValues contentValues = new ContentValues();
        contentValues.put("id", id);
        contentValues.put("soluong",value);
        if(db.update("ct_donHang", contentValues, "id like " + id, null) > 0)
            Toast.makeText(context, "Update successful", Toast.LENGTH_SHORT).show();
        else
            Toast.makeText(context, "Update failed", Toast.LENGTH_SHORT).show();
    }

    public void delete_SP(String id){
        this.db = this.db_helper.getDb();
        if(db.delete("ct_donHang", "id = " + id, null) > 0)
            Toast.makeText(context, "Delete successful", Toast.LENGTH_SHORT).show();
        else
            Toast.makeText(context, "Delete failed", Toast.LENGTH_SHORT).show();
    }

    public void insert_SP(String id) {
        this.db = this.db_helper.getDb();
        ContentValues contentValues = new ContentValues();
        contentValues.put("id",id);
        contentValues.put("soluong","1");
        if(db.insert("ct_donHang", null,contentValues) > 0)
            Toast.makeText(context, "Insert successful", Toast.LENGTH_SHORT).show();
        else
            Toast.makeText(context, "Insert failed", Toast.LENGTH_SHORT).show();
    }

    public String soLuong_CT_SP(){
        this.db = this.db_helper.getDb();
        String soluong = "";
        String sql = "SELECT count(*) FROM ct_donHang;";
        Cursor cursor = db.rawQuery(sql ,null);
        db.rawQuery(sql ,null);
        while (cursor.moveToNext()){
            soluong = cursor.getString(0);
        }
        return soluong;
    }

    public boolean logout(){
        this.db = this.db_helper.getDb();
        if(db.delete("login", "", null) > 0)
        {
            Toast.makeText(context, "Logout successful", Toast.LENGTH_SHORT).show();
            return true;
        }
        else
        {
            Toast.makeText(context, "Logout failed", Toast.LENGTH_SHORT).show();
            return false;
        }
    }

}
