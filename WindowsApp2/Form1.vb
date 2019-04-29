Imports System.IO
Imports MySql.Data.MySqlClient
Public Class Form1
    Public strconn As String = "server=localhost; uid=root; pwd=; database=skripsi;"
    'buat objek adapter
    Dim myadp As MySqlDataAdapter
    'buat data tabel (agar data disusun tabel)
    Dim dt As New DataTable
    'buat perintah query disini
    Public conn As New MySqlConnection(strconn)
    Dim WithEvents SerialPort As New IO.Ports.SerialPort
    Dim selPort As String

    Private Sub Form1_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        RefreshPorts()
        SPSetup()
        If conn.State = ConnectionState.Closed Then
            Try
                'buka koneksi
                conn.Open()
                'tangkap error mysql, jika ada ( ini hanya sebagian)
            Catch mex As MySqlException
                If mex.Number = 0 Then
                    MsgBox("Tidak bisa connect ke db", "no server")
                ElseIf mex.Number = 1045 Then
                    MsgBox("Salah user/pass mysql", "akses ditolak")
                Else
                    MsgBox(mex.Number & mex.Message)
                End If
                'tangkap error umum
            Catch ex As Exception
                MsgBox(ex.Message)
            End Try
        End If
        Call read_data()
    End Sub

    Private Sub read_data()
        Dim query As String
        query = "select * from suhu"
        Try
            'jalankan perintah baca
            myadp = New MySqlDataAdapter(query, conn)
            'isi data tabel
            dt.Clear()
            myadp.Fill(dt)
            'pindahkan isi data tabel ke dgv_data
            DataGridView1.DataSource = dt
        Catch ex As Exception
            MsgBox(ex.Message)
        End Try
    End Sub

    Private Sub Button2_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button2.Click
        If SerialPort.IsOpen Then
            'SerialPort.Write(Chr(1) & Chr(90) & Chr(48) & Chr(57) & Chr(48)) 'txtSendData.Text)
            SerialPort.Write(TextBox1.Text)
        Else
            SPSetup()
            SerialPort.Write(TextBox1.Text)
        End If
    End Sub

    Private Sub ConnectSerial()
        Try
            SerialPort.BaudRate = 9600
            SerialPort.PortName = selPort
            SerialPort.Open()
        Catch
            SerialPort.Close()
        End Try
    End Sub

    Delegate Sub myMethodDelegate(ByVal [text] As String)
    Dim myD1 As New myMethodDelegate(AddressOf myShowStringMethod)

    Sub myShowStringMethod(ByVal myString As String)
        RichTextBox1.AppendText(myString)
    End Sub


    Private Sub SerialPort_DataReceived(ByVal sender As Object, ByVal e As System.IO.Ports.SerialDataReceivedEventArgs) Handles SerialPort.DataReceived
        Dim str As String = SerialPort.ReadExisting
        Invoke(myD1, str)
    End Sub

    Private Sub Button1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button1.Click
        RefreshPorts()
    End Sub

    Private Sub RefreshPorts()
        ComboBox1.Items.Clear()
        For Each sp As String In My.Computer.Ports.SerialPortNames
            ComboBox1.Items.Add(sp)
        Next

        If ComboBox1.Items.Count > 0 Then
            ComboBox1.SelectedIndex = 0
            selPort = ComboBox1.Text
        End If

    End Sub

    Private Sub Button3_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button3.Click
        RichTextBox1.Text = String.Empty
    End Sub

    Private Sub Button4_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button4.Click
        Me.Close()
    End Sub

    Public Sub SPSetup()    'Serial Port Setup
        On Error Resume Next
        If SerialPort.IsOpen Then
            SerialPort.Close()
        End If
        SerialPort.PortName = selPort  ' "COM3"
        SerialPort.BaudRate = 9600
        SerialPort.DataBits = 8
        SerialPort.StopBits = IO.Ports.StopBits.One
        SerialPort.Handshake = IO.Ports.Handshake.None
        SerialPort.Parity = IO.Ports.Parity.None
        '----->  Now change the Encoding to enable 8-bit communications:  <-----
        'SerialPort.Encoding = System.Text.Encoding.GetEncoding(1252)
        SerialPort.Open()
    End Sub

    Private Sub txtPort_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles ComboBox1.SelectedIndexChanged
        selPort = ComboBox1.Text
        Me.Text = String.Format("Arduino Serial Communication - {0}", selPort)
        SPSetup()
    End Sub

    Private Sub Button5_Click(sender As Object, e As EventArgs) Handles Button5.Click
        If Button5.Text = "tambah" Then
            Dim mycmd As New MySqlCommand("INSERT INTO `suhu`(`temp`, `hum`, `heat`) VALUES ('" & TextBox2.Text & " ',' " & TextBox3.Text & " ',' " & TextBox4.Text & "')", conn)
            ' INSERT INTO `suhu`(`temp`, `hum`, `heat`) VALUES (22,32,34)
            Try
                If mycmd.ExecuteNonQuery() = 1 Then
                    MsgBox("insert data berhasil")
                    Call read_data()
                    Exit Sub
                End If

            Catch ex As MySqlException
                MsgBox("insert data gagal")
            End Try
        End If
    End Sub

    Private Sub DataGridView1_CellContentClick(sender As Object, e As DataGridViewCellEventArgs) Handles DataGridView1.CellContentClick
        TextBox2.Text = DataGridView1.Item(0, DataGridView1.CurrentRow.Index).Value
        TextBox3.Text = DataGridView1.Item(1, DataGridView1.CurrentRow.Index).Value
        TextBox4.Text = DataGridView1.Item(2, DataGridView1.CurrentRow.Index).Value

    End Sub

    Private Sub Button6_Click(sender As Object, e As EventArgs) Handles Button6.Click
        Try
            Dim hasilsplit() As String = Split(RichTextBox1.Text, "#")
            TextBox2.Text = hasilsplit(1)
            TextBox3.Text = hasilsplit(2)
            TextBox4.Text = hasilsplit(3)
        Catch Ex As Exception
            MsgBox(Ex.Message, vbOKOnly, "Pesan ")
        End Try
    End Sub

    Private Sub Timer1_Tick(sender As Object, e As EventArgs) Handles Timer1.Tick
        Try
            Dim hasilsplit() As String = Split(RichTextBox1.Text, "#")
            TextBox2.Text = hasilsplit(1)
            TextBox3.Text = hasilsplit(2)
            TextBox4.Text = hasilsplit(3)
            ArcScaleComponent1.Value = TextBox2.Text
            ArcScaleComponent2.Value = TextBox3.Text
            ArcScaleComponent3.Value = TextBox4.Text
        Catch Ex As Exception

        End Try
        RichTextBox1.Text = String.Empty
    End Sub

    Private Sub Timer2_Tick(sender As Object, e As EventArgs) Handles Timer2.Tick
        ' receivedData = ReceiveSerialData()
        ' RichTextBox1.Text &= receivedData

        If Button5.Text = "tambah" Then
            Dim mycmd As New MySqlCommand("INSERT INTO `suhu`(`temp`, `hum`, `heat`) VALUES ('" & TextBox2.Text & " ',' " & TextBox3.Text & " ',' " & TextBox4.Text & "')", conn)
            ' INSERT INTO `suhu`(`temp`, `hum`, `heat`) VALUES (22,32,34)
            Try
                If mycmd.ExecuteNonQuery() = 1 Then
                    TextBox2.Text = ""
                    TextBox3.Text = ""
                    TextBox4.Text = ""
                    Call read_data()
                    Exit Sub
                End If

            Catch ex As MySqlException
                MsgBox("insert data gagal")
            End Try
        End If
    End Sub
End Class
