<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Requests\ProjectCreateRequest;
use App\Requests\ProjectUpdateRequest;
use Dingo\Api\Http\Response;

/**
 * Class ProjectController
 * @package App\Http\Controllers
 */
class ProjectController extends Controller
{

    /**
     * @return Response|object
     */
    public function index() {
        $projects = Project::all();

        return $this->response->array( [ 'data' => $projects ] )->setStatusCode( Response::HTTP_OK );
    }

    /**
     * Store a newly created project in storage.
     *
     * @param ProjectCreateRequest  $request
     *
     * @return Response
     */
    public function store( ProjectCreateRequest $request ) {
        $project = new Project();
        $project->code = $request->code;
        $project->name = $request->name;
        $project->description = $request->description;

        $project->save();

        return $this->response->array( [ 'message' => trans( 'frontend.save' ) ] )->setStatusCode( Response::HTTP_CREATED );
    }

    /**
     * @param $id
     * @return Response|object
     */
    public function show( $id ) {
        $project = Project::find( $id );

        if ( is_null( $project ) ) {
            $this->response->error( trans( 'frontend.not_found' ), Response::HTTP_PRECONDITION_FAILED );
        }

        return $this->response->array( [ 'data' => $project ] )->setStatusCode( Response::HTTP_OK );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @param ProjectUpdateRequest $request
     * @return Response
     */
    public function update( $id, ProjectUpdateRequest $request )
    {
        $project = Project::find( $id );

        if ( is_null( $project ) ) {
            $this->response->error( trans( 'frontend.not_found' ), Response::HTTP_PRECONDITION_FAILED );
        }

        $project->code = $request->code;
        $project->name = $request->name;
        $project->description = $request->description;

        $project->save();

        return $this->response->array( [ 'message' => trans( 'frontend.update' ) ] )->setStatusCode( Response::HTTP_CREATED );
    }

    /**
     * @param $id
     * @return Response|object
     */
    public function destroy($id )
    {
        $project = Project::find( $id );

        if ( is_null( $project ) ) {
            $this->response->error( trans( 'frontend.not_found' ), Response::HTTP_PRECONDITION_FAILED );
        }

        $project->delete();

        return $this->response->array( [ 'message' => trans( 'frontend.deleted' ) ] )->setStatusCode( Response::HTTP_OK );
    }
}
