package Data;

import android.os.AsyncTask;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLConnection;

public class Request extends AsyncTask<String, Void, String> {
    private String req, res;
    private String method;;

    public Request(String req, String method) {
        this.req = req;
        this.method = method;
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
            httpURLConnection.setConnectTimeout(5000);

            httpURLConnection.setDoInput(true);//res
            httpURLConnection.setDoOutput(true);//req

            if(this.method.equals("POST")) {
                httpURLConnection.setRequestMethod("POST");
                urlConnection.setRequestProperty("Content-Type", "application/x-www-form-urlencoded");
                PrintWriter out = new PrintWriter(urlConnection.getOutputStream());
                out.print(this.req);
                out.close();
            }
            else {
                httpURLConnection.setRequestMethod("GET");
            }

            if (httpURLConnection.getResponseCode() == 200) {

                InputStream inputStream = urlConnection.getInputStream();
                InputStreamReader isr = new InputStreamReader(inputStream);
                BufferedReader br = new BufferedReader(isr);

                StringBuilder sb = new StringBuilder();

                String line = br.readLine();

                while (line != null) {
                    sb.append(line);
                    line = br.readLine();
                }
                res = sb.toString();
                return res;
            }

        } catch (Exception e) {
            e.printStackTrace();
            res = e.toString();
        }
        return res;
    }

    @Override
    protected void onProgressUpdate(Void... values) {
        super.onProgressUpdate(values);
    }

    @Override
    protected void onPostExecute(String res) {
        super.onPostExecute(res);
        this.cancel(true);
    }

}


