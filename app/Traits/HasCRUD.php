<?php 

namespace app\Traits;

use Exception;

trait HasCRUD
{
	/**
	 * Get existing record
	 * 
	 * @param  int $id
	 * @return array
	 */
	public function get($id)
	{
		try {
            $record = $this->model->find($id);
            
            echo "<pre>". print_r($record, 1) . "</pre>";

			if ($record) {
				return response([
					'data' => $this->prepData($record),
				]);
			}	

			throw new Exception('No record found');
			
		} catch (Exception $e) {
            return $this->handleError($e);
		}
	}

	/**
	 * Delete existing record
	 * 
	 * @param  int $id
	 * @return array
	 */
	public function delete($id)
	{
		try {
			$record = $this->model->find($id);

			if ($record) {
                $this->model->delete();

				return [
                    'data' => $this->prepData($record) 
                ];
			}

			throw new Exception(__('errors.delete', ['text' => $this->module]));
			
		} catch (Exception $e) {
			$this->handleError($e);
		}
	}

	/**
	 * Update record
	 *
	 * @param  integer $id
	 * @param  array   $data
	 * @return array
	 */
	public function save($data, $id = 0)
	{
		try {
			if (empty($data)) {
				throw new Exception('No data to be saved');
			}

			$record = $this->model->find($id);

			if ($record && $this->model->update($id, $data)) {
				return [
                    'data' => $this->prepData($data) 
                ];
			}

			throw new Exception('Error in updating');
			
		} catch (Exception $e) {
			$this->handleError($e);
		}
	}

    public function store($data)
    {
        try {
            // Prepare data to be saved

            // Save data to db
            if ($this->model->store()) {
                return [
                    'data' => $this->prepData($data) 
                ];
            }

            throw new Exception('Error in adding new data');

        } catch (Exception $e) {
            $this->handleError($e);
        }
    }

    public function update($id, $data)
    {
        try {
        	$record = $this->model->find($id);

        	if (empty($model)) {
        		throw new Exception('Record for the given ID is not found');
        	}

            // Prepare data to be saved here

            if ($this->model->save($data)) {
                return [
                    'data' => $this->prepData($data) 
                ];
            }

            throw new Exception('Error in creating a new record.');

        } catch (Exception $e) {
            $this->handleError($e);
        }
    }

    protected function handleError($e) {
        // Log error here
            
        // Return error message
        return [
            'error' => $e->getMessage(),
        ];
    }

	protected function prepData($data)
	{
        // Prepare the data before returning

		return $data;
	}
}