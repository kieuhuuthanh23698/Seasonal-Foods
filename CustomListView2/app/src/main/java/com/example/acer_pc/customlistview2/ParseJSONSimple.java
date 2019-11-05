package com.example.acer_pc.customlistview2;

import android.content.Context;
import android.os.AsyncTask;
import android.os.Looper;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLConnection;
import java.util.ArrayList;

class ParseJSONSimple extends AsyncTask<String,Void, ArrayList<Image>> {
    private Context mainActivity;
    private String ip;

    public ParseJSONSimple(Context mainActivity, String ip) {
        this.mainActivity = mainActivity;
        this.ip = ip;
    }

    @Override
    protected void onPreExecute() {
        super.onPreExecute();
    }

    @Override
    protected ArrayList<Image> doInBackground(String... strings) {

        Looper.prepare();
        ArrayList<Image> list = new ArrayList<>();
        try {
            System.setProperty("http.proxyHost", "my.proxyhost.com");
            System.setProperty("http.proxyPort", "1234");
            URL link = new URL(strings[0]);
            URLConnection urlConnection = link.openConnection();
            HttpURLConnection httpURLConnection = (HttpURLConnection) urlConnection;
            httpURLConnection.setRequestMethod("GET");
            httpURLConnection.setConnectTimeout(1500);
            httpURLConnection.setDoInput(true);
            ///
            if(httpURLConnection.getResponseCode() == 200) {

                InputStream inputStream = urlConnection.getInputStream();
                InputStreamReader isr = new InputStreamReader(inputStream);
                BufferedReader br = new BufferedReader(isr);

                StringBuilder sb = new StringBuilder();

                String line = br.readLine();

                while (line != null) {
                    sb.append(line);
                    line = br.readLine();
                }

                JSONArray images = new JSONArray(sb.toString());
                for(int i = 0; i < images.length(); i++)
                {
                    JSONObject jsonObject1 = images.getJSONObject(i);
                    Image img = new Image(this.ip + "/SeasonalFoods2/imgs/app/" + jsonObject1.getString("images"));
                    list.add(img);
                }
                Toast.makeText(this.mainActivity, "Loaded " + list.size() + " items !", Toast.LENGTH_LONG).show();
                return list;
            }
            Toast.makeText(this.mainActivity, "Connection failed !", Toast.LENGTH_LONG).show();

        } catch (Exception e) {
            e.printStackTrace();
            Toast.makeText(this.mainActivity, "Exception !\n" + e.toString(), Toast.LENGTH_LONG).show();
        }

        return list;
    }

    @Override
    protected void onProgressUpdate(Void... values) {
        super.onProgressUpdate(values);
    }

    @Override
    protected void onPostExecute(ArrayList<Image> s) {
        super.onPostExecute(s);
    }

}

