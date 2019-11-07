package Objects;

public class CT_GioHang {
    String id, soluong;

    public CT_GioHang(String id, String soluong) {
        this.id = id;
        this.soluong = soluong;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getSoluong() {
        return soluong;
    }

    public void setSoluong(String soluong) {
        this.soluong = soluong;
    }
}
