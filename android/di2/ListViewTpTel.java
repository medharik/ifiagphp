package com.harik.lenovo2017.di2;

import android.app.Activity;
import android.os.Bundle;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.TextView;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.Random;

public class ListViewTpTel extends Activity {
ListView lv;
List<Map<String,String>> data    ;
MonAdapter monapadter;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_list_view_tp_tel);
        lv=findViewById(R.id.listtptel);


        //peupler la liste de données data
        data=new ArrayList<>();
        for (int i=0;i<100;i++){
            Random r=new Random();
            Map<String,String> m=new HashMap<>();
            int prefixe=(r.nextInt(99)%2)+5;
            m.put("tel","0"+prefixe+"1234"+r.nextInt(99999));
            data.add(m);
        }
        monapadter=new MonAdapter();
        lv.setAdapter(monapadter);




    }


    class MonAdapter extends BaseAdapter {

        @Override
        public int getCount() {
            return data.size();
        }

        @Override
        public Object getItem(int position) {
            return data.get(position);
        }

        @Override
        public long getItemId(int position) {
            return position;
        }

        @Override
        public View getView(int position, View convertView, ViewGroup parent) {

            if(convertView==null)
                convertView=getLayoutInflater().inflate(R.layout.itemtel,null);
//recuperer les vues de l'item xml
           ImageView image = convertView.findViewById(R.id.imagetel);
            TextView tvtel=convertView.findViewById(R.id.tvtelmobile);
           //recuperer l'element (map) de list dans la position
            Map<String,String> m=data.get(position);
// mettre le tel dans le textview
            tvtel.setText(m.get("tel"));

                if (m.get("tel").startsWith("05")){
                    image.setImageResource(R.drawable.icon_tel_fixe);
                }else {
                    image.setImageResource(R.drawable.icon_portable);
                }



            return convertView;
        }
    }
}
