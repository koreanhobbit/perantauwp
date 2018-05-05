<?php

namespace App\Http\Controllers;

use App\Form;
use App\FormPart;
use App\FormItem;
use App\FormOption;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Form::orderBy('id', 'desc')->paginate(10);
        return view('admin.form.index', compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.form.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'min:2'],
        ]);

        $form = Form::addNewForm($request);

        return redirect()->route('form.edit', ['form' => $form->id])->with('flashmessage', 'Form was created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Form $form)
    {
        if($request->ajax() && $request->title == 'addItem') {
            $this->validate($request, [
                'label' => ['required', 'min:2'],
            ]);
            $formpart = FormPart::find($request->id);

            //attach formpart type
            $formAttach = $form->formParts()->attach($formpart);

            //attach label value of the formpart
            $item = new FormItem;
            $item->label = $request->label;
            $item->type = $request->type;
            $item->form_id = $form->id;
            $item->form_part_id = $request->id;
            $item->save();

            //attach option 
            if(count($request->option)) {
                foreach($request->option as $options) {
                    $option = new FormOption;
                    $option->label = $options[0];
                    $option->value = $options[1];
                    $option->form_item_id = $item->id;
                    $option->save();
                }
            }
            return view('admin.form.partials._showcase')->render();
        }

        if($request->ajax() && $request->title == 'addTextarea') {
            $this->validate($request, [
                'label' => ['required', 'min:2'],
            ]);
            $formpart = FormPart::find($request->id);
            $form = $form->formParts()->attach($formpart);
            return view('admin.form.partials._showcase')->render();
        }

        if($request->ajax() && $request->title == 'addRadio') {
            $this->validate($request, [
                'label' => ['required', 'min:2'],
                'value.*' => ['required'],
            ]);

            $formpart = FormPart::find($request->id);
            $form = $form->formParts()->attach($formpart);
            return view('admin.form.partials._showcase')->render();
        }

        if($request->ajax() && $request->title == 'addCheckbox') {
             $this->validate($request, [
                'label' => ['required', 'min:2'],
                'value.*' => ['required'],
            ]);
            $formpart = FormPart::find($request->id);
            $form = $form->formParts()->attach($formpart);
            return view('admin.form.partials._showcase')->render();
        }

        if($request->ajax() && $request->title == 'addSelect') {
            $this->validate($request, [
                'label' => ['required', 'min:2'],
                'value.*' => ['required'],
            ]);
            $formpart = FormPart::find($request->id);
            $form = $form->formParts()->attach($formpart);
            return view('admin.form.partials._showcase')->render();
        }

        $formParts = FormPart::orderBy('name', 'asc')->get();
        return view('admin.form.edit', compact('formParts', 'form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        return redirect()->route('form.index')->with('flashmessage', 'Form was successfully deleted!');
    }
}
