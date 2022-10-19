<?php

namespace App\Http\Livewire;

use App;
use QrCode;

use Livewire\Component;
use App\Voucher;

class Vouchers extends Component
{
    public $vouchers, $title, $subtitle, $discount, $often_used, $data_id;
    public $search;

    public function render()
    {
        if(!is_null($this->search)) {
            $this->vouchers = Voucher::where('title', 'LIKE', '%' . $this->search . '%')
                                        ->get();
        }
        else {
            $this->vouchers = Voucher::all();
        }
        
        return view('livewire.vouchers');
    }

    public function resetInputFields()
    {
        $this->title = '';
        $this->subtitle = '';
        $this->discount = '';
        $this->often_used = '';
    }

    public function store()
    {
        $validation = $this->validate([
            'title'         => 'required',
            'subtitle'      => 'required',
            'discount'      => 'required',
            'often_used'    => 'required',
        ]);

        Voucher::create($validation);
        session()->flash('message', 'Criado com sucesso!');
        $this->resetInputFields();
        $this->emit('userStore');
    }

    public function edit($id)
    {
        $data = Voucher::findOrFail($id);
        $this->data_id = $id;
        $this->title = $data->title;
        $this->subtitle = $data->title;
        $this->discount = $data->discount;
        $this->often_used = $data->often_used;
    }

    public function update()
    {
        $validation = $this->validate([
            'title'         => 'required',
            'subtitle'      => 'required',
            'discount'      => 'required',
            'often_used'    => 'required',
        ]);

        $data = Voucher::find($this->data_id);
        $data->update([
            'title'             => $this->title,
            'subtitle'          => $this->subtitle,
            'discount'          => $this->discount,
            'often_used'        => $this->often_used,
        ]);

        session()->flash('message', 'Atualizado com sucesso!');
        $this->resetInputFields();
        $this->emit('userStore');
    }

    public function delete($id)
    {
        Voucher::find($id)->delete();
        session()->flash('message', 'Deletado com sucesso!');
    }

    public function getVoucher($id)
    {
        $voucher = Voucher::find($id);
        $content = '';

        $qrcode = QrCode::size(200)->generate( url("/$voucher->id"));
        $content .= "
        <div style='display:flex; flex-direction: column; border: 2px solid #000; border-radius: 8px; max-width:350px; padding: 24px;'>
            <div>
                <p style='font-weight: bold; font-size:32px;'>
                $voucher->title
                </p>
            </div>
            <div>
                <p style='font-weight: medium; font-size:24px;'>
                $voucher->subtitle
                </p>
            </div>
            <div>
                <p style='font-weight: bold; font-size:48px;'>
                $voucher->discount Off
                </p>
            </div>
            <div>
            <img src='data:image/png;base64, " . base64_encode($qrcode) ."'>
            </div>
            <div>
                <p style='font-weight: medium; font-size:12px;'>
                59509fc5b608d4375c1d97cec770884b71d33d33
                </p>
            </div>
        </div>";

        $voucher->often_used = $voucher->often_used - 1;
        $voucher->save();
        session()->flash('message', 'Voucher adquirido com sucesso!');

        return response()->streamDownload(function () use ($content) {
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadHTML($content);
            echo $pdf->stream();
        }, 'test.pdf');
        
    }

}
