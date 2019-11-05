package com.example.acer_pc.testapi.Helper;

import android.content.Context;
import android.os.AsyncTask;
import android.os.Looper;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.PrintWriter;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLConnection;
import java.util.ArrayList;

public class Request extends AsyncTask<String,Void, String> {
    String data = "Respone";
    String jsonInputString = "";

    public Request(String a) {
        this.jsonInputString = a;
    }

    @Override
    protected void onPreExecute() {
        super.onPreExecute();
    }

    @Override
    protected String doInBackground(String... strings) {
        try {
            System.setProperty("http.proxyHost", "my.proxyhost.com");
            System.setProperty("http.proxyPort", "1234");
            URL link = new URL(strings[0]);
            URLConnection urlConnection = link.openConnection();
            HttpURLConnection httpURLConnection = (HttpURLConnection) urlConnection;
            httpURLConnection.setRequestMethod("POST");
            //urlConnection.setRequestProperty("Content-Type", "application/x-www-form-urlencoded");
            httpURLConnection.setConnectTimeout(5000);
            httpURLConnection.setDoInput(true);
            httpURLConnection.setDoOutput(true);
            urlConnection.setRequestProperty("Content-Type", "application/x-www-form-urlencoded");
            String postParamaters = "param1=value1&param2=value2";
            //urlConnection.setFixedLengthStreamingMode(postParamaters.getBytes().length);
            PrintWriter out = new PrintWriter(urlConnection.getOutputStream());
            out.print(postParamaters);
            out.close();
//            this.jsonInputString = "{'name':'Upendra','job':'Programmer'}";
//            try(OutputStream os = urlConnection.getOutputStream()) {
//                byte[] input = this.jsonInputString.getBytes("utf-8");
//                os.write(input, 0, input.length);
//            }

//
//            Uri.Builder builder = new Uri.Builder()
//                    .appendQueryParameter("firstParam", paramValue1)
//                    .appendQueryParameter("secondParam", paramValue2)
//                    .appendQueryParameter("thirdParam", paramValue3);
//            String query = builder.build().getEncodedQuery();
//
//            OutputStream os = conn.getOutputStream();
//            BufferedWriter writer = new BufferedWriter(
//                    new OutputStreamWriter(os, "UTF-8"));
//            writer.write(query);
//            writer.flush();
//            writer.close();
//            os.close();


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
                data = sb.toString();
                return data;
            }

        } catch (Exception e) {
            e.printStackTrace();
            data = e.toString();
            }
        return data;
    }

    @Override
    protected void onProgressUpdate(Void... values) {
        super.onProgressUpdate(values);
    }

    @Override
    protected void onPostExecute(String respone) {
        super.onPostExecute(respone);
        this.cancel(true);
    }

}

