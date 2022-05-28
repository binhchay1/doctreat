<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\ServiceRepository;
use App\Repositories\UserRepository;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    private ServiceRepository $serviceRepository;
    private UserRepository $userRepository;

    public function __construct(
        ServiceRepository $serviceRepository,
        UserRepository $userRepository
    ) {
        $this->serviceRepository = $serviceRepository;
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $filters = [];
        if (isset($request->name)) {
            $filters['name'] = $request->name;
        }

        if (isset($request->doctor)) {
            $filters['doctor'] = $request->doctor;
        }

        $service = $this->serviceRepository->getListService($filters);
        return view('admin.services.index', compact('service'));
    }

    public function createService()
    {
        $doctors = $this->userRepository->getDoctorList();

        return view('admin.services.create', compact('doctors'));
    }

    public function storeService(ServiceRequest $request)
    {
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'doctor_id' => $request->doctor,
            'status' => 1,
        ];

        $storage_history = $this->serviceRepository->create($data);
        if ($storage_history instanceof Service) {
            alert()->success('Thành công!', 'Tạo dịch vụ thành công!');
        } else {
            alert()->warning('Cảnh báo!', 'Tạo dịch vụ lỗi!');
        }

        return redirect()->route('admin.service.index');
    }

    public function viewUpdateService(Service $service)
    {
        $doctors = $this->userRepository->getDoctorList();

        return view('admin.services.update', compact('service', 'doctors'));
    }

    public function updateService(ServiceRequest $request, Service $service)
    {
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'doctor' => $request->doctor
        ];

        $isUpdated = $this->serviceRepository->updateById($service->id, $data);
        if ($isUpdated) {
            alert()->success('Thành công!', 'Cập nhật ' . $request->name . ' thành công!');
        } else {
            alert()->warning('Cảnh báo!', 'Cập nhật tài khoản lỗi!');
        }

        return redirect()->route('admin.service.index');
    }

    public function deleteService (int $serviceId)
    {
        $service = $this->serviceRepository->deleteById($serviceId);

        if ($service) {
            alert()->success('Thành công!', 'Xóa dịch vụ thành công!');
        } else {
            alert()->warning('Cảnh báo!', 'Xóa dịch vụ thành công!');
        }

        return redirect()->route('admin.service.index');
    }
}
