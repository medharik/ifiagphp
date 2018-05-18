package com.harik.lenovo2017.di2;

import android.app.Activity;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;

public class Menu extends Activity implements AdapterView.OnItemClickListener {
ListView lvmenu;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menu);

        lvmenu=findViewById(R.id.lvmenu);
lvmenu.setOnItemClickListener(this);

    }

    @Override
    public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
        Intent i=null;
        switch (position){
            case 0 :
                i=new Intent(Intent.ACTION_VIEW, Uri.parse("geo:33.2324324,-7.333333"));
                ; break;
            case  1:
                i=new Intent(Intent.ACTION_SENDTO,Uri.parse("smsto:065645342"));
                ; break;
            case 2 :
                i=new Intent(Intent.ACTION_VIEW,Uri.parse("http://www.google.com"));
                ; break;
            case 3 :
                i=new Intent(Menu.this,ListArray.class);// intent explicite
                ; break;
            case 4 :
                i=new Intent(Menu.this,ListViewPersonnalisee.class);// intent explicite
                ; break;

            default: ;

        }

        startActivity(i);
    }
}
