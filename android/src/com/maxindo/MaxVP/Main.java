package com.maxindo.MaxVP;

import android.app.Activity;
import android.content.Intent;
import android.net.VpnService;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

public class Main extends Activity implements View.OnClickListener {

    private TextView mServerAddress;
    private TextView mServerPort;
    private TextView mUserName;
    private TextView mPassword;
    private Button connectBut;
    private VpnProfile PPTP_PROFILE = new PptpProfile();

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.main);

        mServerAddress = (TextView) findViewById(R.id.address);
        mServerPort = (TextView) findViewById(R.id.port);
        mUserName = (TextView) findViewById(R.id.username);
        mPassword = (TextView) findViewById(R.id.password);

        connectBut = (Button) findViewById(R.id.connectBut);
        connectBut.setOnClickListener(this);
    }

    public void onClick(View v) {
        Toast.makeText(this, "Preparing MaxPV Service...", Toast.LENGTH_SHORT).show();
        Intent intent = VpnService.prepare(getApplicationContext());
        if (intent != null) {
            startActivityForResult(intent, 0);
        } else {
            onActivityResult(0, RESULT_OK, null);
        }
    }

    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        if (resultCode == RESULT_OK) {
            String prefix = getPackageName();
            Intent intent = new Intent(this, MaxVPNService.class)
                    .putExtra(prefix + ".profile", mServerAddress.getText().toString())
                    .putExtra(prefix + ".PORT", mServerPort.getText().toString())
                    .putExtra(prefix + ".USERNAME", mUserName.getText().toString())
                    .putExtra(prefix + ".PASSWORD", mPassword.getText().toString());
            startService(intent);
        }
    }
}
