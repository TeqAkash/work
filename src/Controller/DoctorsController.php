<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Doctors Controller
 *
 * @property \App\Model\Table\DoctorsTable $Doctors
 * @method \App\Model\Entity\Doctor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DoctorsController extends AppController
{
    public function firstpage(){
        $this->viewBuilder()->setLayout('index');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Departments'],
        ];
        $doctors = $this->paginate($this->Doctors);

        $this->set(compact('doctors'));
    }

    /**
     * View method
     *
     * @param string|null $id Doctor id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $doctor = $this->Doctors->get($id, [
            'contain' => ['Departments', 'Appoints','Appoints.Patients'],
        ]);

        $this->set(compact('doctor'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $doctor = $this->Doctors->newEmptyEntity();
        if ($this->request->is('post')) {
            $doctor = $this->Doctors->patchEntity($doctor, $this->request->getData());
            if ($this->Doctors->save($doctor)) {
                $this->Flash->success(__('The doctor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The doctor could not be saved. Please, try again.'));
        }
        $departments = $this->Doctors->Departments->find('list', ['limit' => 200])->all();
        $this->set(compact('doctor', 'departments'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Doctor id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $doctor = $this->Doctors->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $doctor = $this->Doctors->patchEntity($doctor, $this->request->getData());
            if ($this->Doctors->save($doctor)) {
                $this->Flash->success(__('The doctor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The doctor could not be saved. Please, try again.'));
        }
        $departments = $this->Doctors->Departments->find('list', ['limit' => 200])->all();
        $this->set(compact('doctor', 'departments'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Doctor id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $doctor = $this->Doctors->get($id);
        if ($this->Doctors->delete($doctor)) {
            $this->Flash->success(__('The doctor has been deleted.'));
        } else {
            $this->Flash->error(__('The doctor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
    parent::beforeFilter($event);
    // Configure the login action to not require authentication, preventing
    // the infinite redirect loop issue
    $this->Authentication->addUnauthenticatedActions(['login','add','firstpage','forget']);
    }

    public function login()
    {
    $this->request->allowMethod(['get', 'post']);
    $result = $this->Authentication->getResult();
    // regardless of POST or GET, redirect if user is logged in
    if ($result->isValid()) {
        // redirect to /articles after login success
        $redirect = $this->request->getQuery('redirect', [
            'controller' => 'Doctors',
            'action' => 'view',
            $this->request->getAttribute('identity')->getIdentifier()
            
        ]);

        return $this->redirect($redirect);
    }
    // display error if user submitted and authentication failed
    if ($this->request->is('post') && !$result->isValid()) {
        $this->Flash->error(__('Invalid username or password'));
    }
    }
    public function logout()
    {
    $result = $this->Authentication->getResult();
    // regardless of POST or GET, redirect if user is logged in
    if ($result->isValid()) {
        $this->Authentication->logout();
        return $this->redirect(['controller' => 'Doctors', 'action' => 'firstpage']);
    }
    }

      public function forget(){
     if($this->request->is('post')){
         $email=   $this->request->getData();
        $hello = $this->Users->find('All')->where(['email'=>implode($email)])->toList();
if(!empty($hello)){
$token = rand(111111 ,999999);
$data = $this->connection->update ("users", [ "token" => $token ],
[ "email" => implode($email) ]);
if($data){
    $this->redirect(['action'=>'reset']);
}



}else{
    return $this->Flash->error("The given email is not registred");
}
     
    
    }
    }
    public function sendMail($token=null){
        $a= "";
        $message = "your Appointment is booked on  $a requested time our agent get in touch with you shortly";            
        $mailer = new Mailer();
        $mailer->setTransport('mail');
        $mailer->setFrom(['tqmassociate@gmail.com' => '88Acers'])
        ->setTo('rohi699t@gmail.com')
        ->setSubject('Test')
        ->deliver($message);
        return $this->redirect(['action'=>'reset',$token]);
    }
    public function reset(){
       
        if($this->request->is('post')){
            $user = $this->request->getData();

            $token =  $user['token'];
            $password =  $user['password'];
          
$hasher = new DefaultPasswordHasher();
$password = $hasher->hash($password);
// dd($password);
            $data = $this->connection->update ("users", [ "password" => $password ],
[ "token" => $token ]);
if($data){

    $this->Flash->success("The Password has been updated");
   return $this->redirect(['action'=>'login']);
}
       
// dd($token, $password);

        }

} 
