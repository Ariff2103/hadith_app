<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Hadiths Controller
 *
 * @property \App\Model\Table\HadithsTable $Hadiths
 * @method \App\Model\Entity\Hadith[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HadithsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories'],
        ];
        $hadiths = $this->paginate($this->Hadiths);

        $this->set(compact('hadiths'));
    }

    /**
     * View method
     *
     * @param string|null $id Hadith id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hadith = $this->Hadiths->get($id, [
            'contain' => ['Categories'],
        ]);

        $this->set(compact('hadith'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hadith = $this->Hadiths->newEmptyEntity();
        if ($this->request->is('post')) {
            $hadith = $this->Hadiths->patchEntity($hadith, $this->request->getData());
            if ($this->Hadiths->save($hadith)) {
                $this->Flash->success(__('The hadith has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hadith could not be saved. Please, try again.'));
        }
        $categories = $this->Hadiths->Categories->find('list', ['limit' => 200])->all();
        $this->set(compact('hadith', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Hadith id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hadith = $this->Hadiths->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hadith = $this->Hadiths->patchEntity($hadith, $this->request->getData());
            if ($this->Hadiths->save($hadith)) {
                $this->Flash->success(__('The hadith has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hadith could not be saved. Please, try again.'));
        }
        $categories = $this->Hadiths->Categories->find('list', ['limit' => 200])->all();
        $this->set(compact('hadith', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Hadith id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hadith = $this->Hadiths->get($id);
        if ($this->Hadiths->delete($hadith)) {
            $this->Flash->success(__('The hadith has been deleted.'));
        } else {
            $this->Flash->error(__('The hadith could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
