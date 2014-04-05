using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using System.Data.SqlClient;
using System.Configuration;
using System.Web.Security;

public partial class _Default : System.Web.UI.Page
{
    public SqlConnection oConn;
    public SqlCommand oCmd;
    public SqlDataReader sdr;
    public string SQL;
    public string maxID;
    public DbConn dbConn;
    public DataSet ds;
    public DataTable dt;


    protected void Page_Load(object sender, EventArgs e)
    {
        dbConn = new DbConn();
        SQL = "SELECT * FROM tblRoleAccess";
        ds = new DataSet();
        ds = dbConn.createDataSet(SQL);
        dt = new DataTable();
        dt = ds.Tables[0];
        //dt.Rows.Count.ToString();


        Response.Write(dt.Rows.Count.ToString() + "<br/>");

        for (int i = 0; i < dt.Rows.Count; i++)
        {
            Response.Write("INSERT INTO tblRoleAccess VALUES('" + dt.Rows[i][0].ToString() + "', '" + dt.Rows[i][1].ToString() + "', '" + dt.Rows[i][2].ToString() + "')<br/>");
        }


    }
}
