<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competetitors;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Email as EmailResource;

class CompetetiorsController extends Controller
{

    public function index($id)
    {
        Log::info('competetion me in kiye hai');
        // Get all the Emails from db
        $Emails = Competetitors::where('slug_id', $id)->get();
        Log::info('sime data hai' . $Emails);
        $response = [
            'success' => true,
            'data' => EmailResource::collection($Emails),
            'message' => 'Emails retrieved successfully.',
            'count' => count($Emails)];

        return response()->json($response, 200);
    }
    public function edit($id)
    {
        $Emails = Competetitors::find($id);
        Log::info($Emails . "value aa gaya hai");
        if (is_null($Emails)) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Emails not found.',
            ];
            return response()->json($response, 404);
        } else {
            $response = [
                'success' => true,
                'data' => new EmailResource($Emails),
                'message' => 'Emails retrieved successfully.',
            ];
            return response()->json($response, 200);
        }
    }
    public function destroy($id)
    {
        $Emails = Competetitors::find($id);
        if (is_null($Emails)) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'URL not found.'
            ];
            return response()->json($response, 404);
        } else {
            $Emails->delete();
            $response = [
                'success' => true,
                'data' => new EmailResource($Emails),
                'message' => 'URL deleted successfully.'
            ];

            return response()->json($response, 200);
        }
    }

    public function update(Request $request)
    {
        log::info($request . "update ka value aa gaya hai");
        $rules = array(
            // 'email' => 'required',
            // 'phone_number' => 'required',
        );
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors(),
            ];
            return response()->json($response, 422);
        }

        $form_data = array(
            'project_name' => $request->project_name,
            'project_id' => $request->project_id,
            'website' => $request->website,
            'name' => $request->name,
            'facebook' => $request->facebook,
            'youtube' => $request->youtube,
            'twitter' => $request->twitter,
            'linedin' => $request->linedin,
            'instagram' => $request->instagram,
            'pinterest' => $request->pinterest,
            'reddit' => $request->reddit,
            'tiktok' => $request->tiktok,

        );
        Competetitors::whereId($request->email_hidden_id)->update($form_data);
        $response = [
            'success' => true,
            'message' => 'URL update successfully.',
        ];
        // return response()->json($response, 200);

        return response()->json($response, 200);

    }

    public function storedata(Request $request)
    {
        Log::info('project name me kya a rha hai' . $request->project_name);
        Log::info("store me in kiye hai");
        $data = new Competetitors();
        $data->project_name = $request->project_name;
        $data->project_id = $request->project_id;
        $data->name = $request->name;
        $data->website = $request->website;
        $data->facebook = $request->facebook;
        $data->youtube = $request->youtube;
        $data->twitter = $request->twitter;
        $data->linedin = $request->linedin;
        $data->instagram = $request->instagram;
        $data->pinterest = $request->pinterest;
        $data->reddit = $request->reddit;
        $data->tiktok = $request->tiktok;
        $data->slug_id = $request->u_org_organization_id;
        $data->slugname = $request->u_org_slugname;

        $data->save();
        Log::info('kya kya aa raha hai' . $data);
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Data stored successfully.',
        ];
        // if con

        return response()->json($response, 200);

    }
}
