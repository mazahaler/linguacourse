<?php

namespace App\Http\Controllers;

use App\Http\Requests\courses\CreateCourseRequest;
use App\Http\Resources\CourseCollection;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

/**
 * Class CourseController
 * @package App\Http\Controllers
 */
class CourseController extends Controller
{
    /**
     * CourseController constructor.
     */
    public function __construct()
    {
        $this->middleware( 'auth:api' );
    }

    /**
     * Returns a resource collection of courses
     *
     * @return JsonResponse
     */
    public function all(): JsonResponse
    {
        $courses = new CourseCollection(Course::orderBy('created_at', 'desc')->paginate(20));

        return response()->json( [ 'data' => $courses ] );
    }

    /**
     * Creates new course
     *
     * @param CreateCourseRequest $request
     *
     * @return JsonResponse
     */
    public function create( CreateCourseRequest $request ): JsonResponse
    {
        $course = Course::create( array_merge( $request->all(), [
            'author_id' => auth()->user()->id,
            'slug'      => Str::slug( $request->get( 'title' ), '-' ),
        ] ) );

        return response()->json( [ 'data' => $course, 'message' => 'The course has been created' ] );
    }

    public function get( \Illuminate\Http\Request $request): CourseResource
    {
        return new CourseResource(Course::findOrFail(1));
    }
}
